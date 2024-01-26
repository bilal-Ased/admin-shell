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
                            <label class="form-label" for="email">Title:</label>
                            <input type="title" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pwd">Content:</label>
                            <input type="content" class="form-control" id="content" name="content">
                        </div>

                    <div class="form-group">
                    <label for="mention_users">Mention Users:</label>
                  <input type="text" name="mention_users" id="mention_users" class="form-control" placeholder="Type @ to mention users">
                  <div id="mentionUsersList"></div>


                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                        <label class="form-check-label" for="flexCheckDefault1">
                            All Users
                        </label>
                    </div>
                </div>
            </div>
                        <button type="submit" class="btn btn-primary">Create Announcment</button>
                        <button type="submit" class="btn btn-danger">cancel</button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>


