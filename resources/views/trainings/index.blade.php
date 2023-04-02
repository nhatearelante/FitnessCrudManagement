<x-layout>
    <div class="container">
        <h1>Trainings</h1>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTrainingModal">
                        Add Training
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Difficulty Level</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Trainer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $training)
                            <tr>
                                <td>{{ $training->name }}</td>
                                <td>{{ $training->difficulty }}</td>
                                <td>{{ $training->start_time }}</td>
                                <td>{{ $training->end_time }}</td>
                                <td>{{ $training->trainer->name }}</td>
                                <td>
                                    <a href="{{ route('trainings.show', $training->id) }}"
                                        class="btn btn-secondary btn-sm">View</a>
                                    <a href="{{ route('trainings.edit', $training->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('trainings.destroy', $training->id) }}" method="POST"
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

    <!-- Add Training Modal -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1" role="dialog" aria-labelledby="addTrainingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTrainingModalLabel">Add Training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('trainings.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="difficulty">Difficulty Level</label>
                            <select class="form-control" id="difficulty" name="difficulty" required>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input type="datetime-local" class="form-control" id="start_time" name="start_time"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
                        </div>
                        <div class="form-group">
                            <label for="trainer_id">Trainer</label>
                            <select class="form-control" id="trainer_id" name="trainer_id" required>
                                @foreach ($trainers as $trainer)
                                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Training</button>
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
