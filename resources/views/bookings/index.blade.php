<x-layout>
    <div class="container">
        <h1>Bookings</h1>
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBookingModal">
                        Add Booking
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Training</th>
                            <th>Booking Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->member->name }}</td>
                                <td>{{ $booking->training->name }}</td>
                                <td>{{ $booking->booking_time }}</td>
                                <td>
                                    <a href="{{ route('bookings.show', $booking->id) }}"
                                        class="btn btn-secondary btn-sm">View</a>
                                    <a href="{{ route('bookings.edit', $booking->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Booking Modal -->
    <div class="modal fade" id="addBookingModal" tabindex="-1" role="dialog" aria-labelledby="addBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookingModalLabel">Add Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('bookings.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="member_id">Member</label>
                            <select class="form-control" id="member_id" name="member_id" required>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="training_id">Training</label>
                            <select class="form-control" id="training_id" name="training_id" required>
                                @foreach ($trainings as $training)
                                    <option value="{{ $training->id }}">{{ $training->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="booking_time">Booking Time</label>
                            <input type="datetime-local" class="form-control" id="booking_time" name="booking_time"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000); // time in milliseconds
    </script>
</x-layout>
