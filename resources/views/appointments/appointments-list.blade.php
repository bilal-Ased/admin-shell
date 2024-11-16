<x-app-layout :assets="$assets ?? []">
   <style>
      .appointments-style {
         background: #d1e3f7;
         color: #1a4d85;
         padding: 0 5px;
         font-size: 12px;
         font-weight: 700;
         letter-spacing: 0.06em;
      }



      /* Style for even rows */
      .dataTables_wrapper tr:nth-child(even) {
         background-color: #f9f9f9;
         /* Light gray color */
      }

      body {
         overflow: -moz-scrollbars-vertical;
         overflow-x: hidden;
         /* overflow-y: hidden; */
         height: 100%;
         margin: 0;
      }
   </style>



   <div>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
      <div class="row">
         <div class="col-sm-12">
            <div class="card p-3">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">All Appointments</h4>
                  </div>
               </div>
               <div class="card-body px-0">
                  {{ $dataTable->table() }}
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="modal fade" id="updateAppointmentModal" tabindex="-1" aria-labelledby="updateAppointmentModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="updateAppointmentModalLabel">Update Appointment</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               @include('appointments.edit-modal')
            </div>
         </div>
      </div>
   </div>


   <script>
      function updateAppointmentModal(customer) {
         customer = JSON.parse(customer)
// Populate the form fields with customer data
   $('#customerFirstName').val(customer.first_name);
   $('#customerLastName').val(customer.last_name);
   $('#customerPhoneNumber').val(customer.phone_number);
   $('#customerEmail').val(customer.email);
   $('#alternateNumber').val(customer.alternate_number || '');
   $('#dateOfBirth').val(customer.date_of_birth || '');
   $('#gender').val(customer.gender || '');

// If you want to update form action dynamically (optional)

var url = `{{ url('/customers/update/') }}/${customer.id}`;


$('#editCustomerForm').attr('action',);
$('#updateAppointmentModal').modal('show');
}

   </script>

   @push('scripts')
   {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
   @endpush





</x-app-layout>