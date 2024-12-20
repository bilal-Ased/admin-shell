<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Service</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('services.store')}}">

                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="name">Name:</label>
                            <input type="title" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="price">Price:</label>
                            <input type="number" min="0.00" max="1000.00" step="0.01"  id="price" name="price" class="form-control"/>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-danger">cancel</button>

                </div>
            </div>

                    </form>
                </div>
            </div>
        </div>
</x-app-layout>


