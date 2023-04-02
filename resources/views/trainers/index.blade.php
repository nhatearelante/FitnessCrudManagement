<x-layout>
    <div class="container">
        <h1>Trainers</h1>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTrainerModal">
                        Add Trainer
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Specialization</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainers as $trainer)
                            <tr>
                                <td>{{ $trainer->name }}</td>
                                <td>{{ $trainer->email }}</td>
                                <td>{{ $trainer->specialization }}</td>
                                <td>
                                    <a href="{{ route('trainers.show', $trainer->id) }}"
                                        class="btn btn-secondary btn-sm">View</a>
                                    <a href="{{ route('trainers.edit', $trainer->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST"
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

    <div class="modal fade" id="addTrainerModal" tabindex="-1" role="dialog" aria-labelledby="addTrainerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTrainerModalLabel">Add Trainer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('trainers.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="address">Specialization</label>
                            <input type="text" class="form-control" id="specialization" name="specialization">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
