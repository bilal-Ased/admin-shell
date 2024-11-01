<div class="row">
    <div class="col">
        <label class="d-flex align-items-center gap-1"><span>Assigned To </span> <small
                class="text-danger">*</small></label> <select id="assignedTo" class="form-select" name="assigned_to">

        </select>
    </div>
    <div class=" col">
        <label class="d-flex align-items-center gap-1"><span>Status </span> <small class="text-danger">*</small></label>
        <select id="ticketStatus" class="form-control" name="status_id">
        </select>
    </div>
</div>


<script>
    $(function() {

            initializeSelect2('#ticketStatus', '{{URL('/settings/tickets/statuses')}}','ticketForm', selectStatus);
           
            listSelect2Data('assignedTo', `{{URL('settings/all-users')}}`, 'enter user name', 'ticketForm', selectAssignedUser);
        });

</script>