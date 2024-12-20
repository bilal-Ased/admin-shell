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
      function updateAppointmentModal(appointment) {
         appointment = JSON.parse(appointment)
// Populate the form fields with customer data
   $('input[name="appointment_id"]').val(appointment.id);
   $('#customerFirstName').val(appointment.first_name);
   $('#customerLastName').val(appointment.last_name);
   $('#customerPhoneNumber').val(appointment.phone_number);
   $('#customerEmail').val(appointment.email);
   $('#alternateNumber').val(appointment.alternate_number || '');
   $('#dateOfBirth').val(appointment.date_of_birth || '');
   $('#gender').val(appointment.gender || '');

// If you want to update form action dynamically (optional)

var url = `{{ url('/customers/update/') }}/${appointment.id}`;


$('#editCustomerForm').attr('action',);
$('#updateAppointmentModal').modal('show');
}

   </script>

   @push('scripts')
   {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
   @endpush





</x-app-layout>