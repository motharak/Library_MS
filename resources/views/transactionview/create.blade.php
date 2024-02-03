<!-- resources/views/add_transaction.blade.php -->

@extends('layouts.app')
@section('pageTitle', 'Add Transaction')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Make Transaction</h2>

        <!-- Ask the user whether they are borrowing or returning -->
        <div class="mb-3">
            <label for="transaction_type" class="form-label">Are you borrowing or returning a book?</label>
            <select id="transaction_type" class="form-control" onchange="showForm()">
                <option selected>Choose</option>
                <option value="Borrow">Borrow</option>
                <option value="Return">Return</option>
            </select>
        </div>

        <!-- Form for adding a new transaction (Initially hidden) -->
        <form method="POST"  id="transactionForm" style="display:none; action="{{ route('tran.store') }}">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">User ID:</label>
                <input type="text" name="user_id" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="book_id" class="form-label">Book ID:</label>
                <input type="text" name="book_id" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="transaction_date" class="form-label" id="transactionDateLabel">Borrow Date:</label>
                <input type="date" name="transaction_date" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="returned_date" class="form-label" id="returnedDateLabel" style="display:none;">Return Date:</label>
                <input type="date" id="returnedDateInput" name="returned_date" class="form-control" style="display:none;" >
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date:</label>
                <input type="date" name="due_date" class="form-control" >
            </div>

            <!-- You can add more fields as needed -->

            <button type="submit" class="btn btn-primary">Make Transaction</button>
        </form>
    </div>

    <script>
        function showForm() {
            var transactionType = document.getElementById("transaction_type").value;
            var transactionForm = document.getElementById("transactionForm");
            var transactionDateLabel = document.getElementById("transactionDateLabel");
            var returnedDateLabel = document.getElementById("returnedDateLabel");

            if (transactionType === "Borrow") {
                transactionDateLabel.innerText = "Borrow Date:";
                returnedDateLabel.style.display = "none";
                transactionForm.style.display = "block";
            } else if (transactionType === "Return") {
                transactionDateLabel.innerText = "Return Date:";
                // returnedDateLabel.style.display = "block";
                // returnedDateInput.style.display = "block";
                transactionForm.style.display = "block";
            }
        }
    </script>
@endsection
