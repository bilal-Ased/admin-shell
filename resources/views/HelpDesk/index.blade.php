<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Ticket</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="customer">Customer:</label>
                            <input type="title" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="issueSource">Issue Source:</label>
                            <input type="content" class="form-control" id="content" name="content">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="issueCategory">Issue Category:</label>
                            <input type="content" class="form-control" id="content" name="content">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="disposition">Disposition:</label>
                            <input type="content" class="form-control" id="content" name="content">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="department">Department:</label>
                            <input type="content" class="form-control" id="content" name="content">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="assignedto">Assigned to:</label>
                            <input type="content" class="form-control" id="content" name="content">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="ticketStatus">Ticket Status:</label>
                            <input type="content" class="form-control" id="content" name="content">
                        </div>


                        <div class="form-group">
                            <label class="form-label" for="comments">Comments:</label>
                            <input type="content" class="form-control" id="content" name="content">
                        </div>


                        <button type="submit" class="btn btn-primary">Create Ticket</button>
                        <button type="submit" class="btn btn-danger">cancel</button>

                </div>
            </div>

                    </form>
                </div>
            </div>
        </div>
</x-app-layout>


