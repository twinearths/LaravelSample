<h2>Send</h2>
<form method="POST" action="/receive">
    @csrf 
    <textarea name="content"> </textarea>
    <button type="submit">Send</button>
</form>