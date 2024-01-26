<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Announcment</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('announcements.store') }}">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    var users = {!! $users !!};

    $(document).ready(function() {
        // Input field for mentioning users
        var mentionUsersInput = $('#mention_users');
        var mentionUsersList = $('#mentionUsersList');

        mentionUsersInput.on('input', function() {
            var inputText = mentionUsersInput.val();
            var atIndex = inputText.indexOf('@');

            // Clear the list
            mentionUsersList.empty();

            // Check if the input text contains @ symbol
            if (atIndex !== -1) {
                // Extract the search query after @ symbol
                var query = inputText.substring(atIndex + 1);

                // Filter users based on the search query
                var matchingUsers = users.filter(function(user) {
                    // Check if user.username is defined before using includes
                    return user.username && user.username.includes && user.username.includes(query);
                });

                // Display matching users in the list
                matchingUsers.forEach(function(user) {
                    mentionUsersList.append('<div class="mention-user" data-username="' + user.username + '">' + user.username + '</div>');
                });

                // Add click event to select the user
                $('.mention-user').on('click', function() {
                    var selectedUsername = $(this).data('username');
                    mentionUsersInput.val('@' + selectedUsername);
                    mentionUsersList.empty();
                });
            }
        });
    });
</script>

