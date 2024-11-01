<h4>{{$message['subject']}}</h4>
<form action="{{url('emails/respond/'.$message['id']) }}" method="POST">
    <label>
        Message:
        <textarea name="content" cols="30" rows="10"></textarea>
    </label>
    <button type="submit">Respond</button>
</form>