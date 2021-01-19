<form method="post" action="{{route('Wesh')}}">
@csrf
    <input type="text" name="first_name" placeholder="First Name"><br/>
    <input type="text" name="last_name" placeholder="Last Name"><br/>
    <input type="text" name="email" placeholder="Email"><br/>
    <input type="password" name="password" placeholder="Password"><br/>
    <button type="submit"> Create User </button>
</form>