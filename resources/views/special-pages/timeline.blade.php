<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-lg-12">
         <a href="{{ route('customers.index') }}" class="btn btn-primary">
            <i class="fa fa-arrow-left"></i> Back to Customers
         </a>
         <div class="card">
            <div class="card-body">
               <div class="iq-timeline m-0 d-flex align-items-center justify-content-between position-relative">
                  <ul class="list-inline p-0 m-0 w-100">
                     <li>
                        <div class="time">
                           <span>Jan 2020</span>
                        </div>
                        <div class="content">
                           <div class="timeline-dots new-timeline-dots"></div>
                           <h6 class="mb-1">Client Login</h6>
                           <div class="d-inline-block w-100">
                              <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple There are many variations
                                 of passages of Lorem Ipsum available, but the majority have suffered alteration in some
                                 form, by injected humour, or randomised words which don't look even slightly
                                 believable.</p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="time bg-success">
                           <span>Feb 2020</span>
                        </div>
                        <div class="content">
                           <div class="timeline-dots new-timeline-dots border-success"></div>
                           <h6 class="mb-1">Scheduled Maintenance</h6>
                           <div class="d-inline-block w-100">
                              <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple There are many variations
                                 of passages of Lorem Ipsum available, but the majority have suffered alteration in some
                                 form, by injected humour, or randomised words which don't look even slightly
                                 believable.</p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="time">
                           <span>March 2020</span>
                        </div>
                        <div class="content">
                           <div class="timeline-dots border-primary"></div>
                           <h6 class="mb-1">Client Call</h6>
                           <div class="d-inline-block w-100">
                              <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple There are many variations
                                 of passages of Lorem Ipsum available, but the majority have suffered alteration in some
                                 form, by injected humour, or randomised words which don't look even slightly
                                 believable.</p>
                           </div>
                        </div>
                     </li>

                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

</x-app-layout>