<x-layout>
    <div class="container">
        <h1>Payments</h1>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPaymentModal">
                        Add Payment
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Member</th>
                            <th>Training</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->member->name }}</td>
                                <td>{{ $payment->training->name }}</td>
                                <td>{{ $payment->payment_amount }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>
                                    <a href="{{ route('payments.show', $payment->id) }}"
                                        class="btn btn-secondary btn-sm">View</a>
                                    <a href="{{ route('payments.edit', $payment->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
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

    <!-- Add Payment Modal -->
    <div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentModalLabel">Add Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('payments.store') }}">
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
                            <label for="payment_amount">Payment Amount</label>
                            <input type="number" class="form-control" id="payment_amount" name="payment_amount"
                                required min="0">
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="cash">Cash</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="debit_card">Debit Card</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Payment</button>
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
