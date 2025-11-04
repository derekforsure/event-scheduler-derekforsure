<?php

namespace App\Http\Requests;

use App\Models\Room;
use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'participants' => 'required|integer|min:1',
            'room_id' => 'required|exists:rooms,id',
            'organizer_id' => 'required|exists:users,id',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $validated = $this->validated();

            if (!isset($validated['room_id']) || !isset($validated['participants']) || !isset($validated['start_time']) || !isset($validated['end_time'])) {
                return;
            }

            $room = Room::find($validated['room_id']);
            $startTime = new \DateTime($validated['start_time']);
            $endTime = new \DateTime($validated['end_time']);

            // Room Capacity Check
            if ($validated['participants'] > $room->capacity) {
                $validator->errors()->add('participants', 'The number of participants exceeds the room capacity.');
            }

            // Room Availability Check
            // Convert DateTime objects to strings for comparison..
            $eventTimeStart = $startTime->format('H:i:s');
            $eventTimeEnd = $endTime->format('H:i:s');

            if ($eventTimeStart < $room->open_time || $eventTimeEnd > $room->close_time) {
                $validator->errors()->add('start_time', 'The event is outside the room\'s operating hours.');
            }

            // Overlapping Events Check (with 15-minute gap)
            // Clone DateTime objects before modifying them to prevent side effects on other checks
            $overlapStartTime = clone $startTime;
            $overlapEndTime = clone $endTime;

            $query = Event::where('room_id', $validated['room_id'])
                ->where(function ($query) use ($overlapStartTime, $overlapEndTime) {
                    $query->where('start_time', '<', $overlapEndTime->modify('+15 minutes')->format('Y-m-d H:i:s'))
                          ->where('end_time', '>', $overlapStartTime->modify('-15 minutes')->format('Y-m-d H:i:s'));
                });

            // If it's an update request, ignore the current event
            if ($this->route('event')) {
                $query->where('id', '!=', $this->route('event')->id);
            }

            $conflictingEvents = $query->count();

            if ($conflictingEvents > 0) {
                $validator->errors()->add('start_time', 'The event time conflicts with another event in the same room.');
            }
        });
    }
}