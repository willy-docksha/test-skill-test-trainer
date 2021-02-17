<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Booking as BookingResource;
use App\Models\Booking;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return $this->sendResponse(BookingResource::collection($bookings), 'Booking data retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'room_id' => 'required',
            'total_person' => 'required',
            'booking_time' => 'required',
            'noted' => 'required',
            'check_in_time' => 'required',
            'check_out_time' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $booking = Booking::create($input);

        return $this->sendResponse(new BookingResource($booking), 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        if (is_null($booking)) {
            return $this->sendError('Booking not found.');
        }

        return $this->sendResponse(new BookingResource($booking), 'Booking retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'room_id' => 'required',
            'total_person' => 'required',
            'booking_time' => 'required',
            'noted' => 'required',
            'check_in_time' => 'required',
            'check_out_time' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $booking->user_id = $input['user_id'];
        $booking->room_id = $input['room_id'];
        $booking->total_person = $input['total_person'];
        $booking->booking_time = $input['booking_time'];
        $booking->noted = $input['noted'];
        $booking->check_in_time = $input['check_in_time'];
        $booking->check_out_time = $input['check_out_time'];
        $booking->save();

        return $this->sendResponse(new BookingResource($booking), 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return $this->sendResponse([], 'Booking deleted successfully.');
    }
}
