<!--
    Task 3 Guest, step 4:
    add the HTTP method and url as instructed
-->
<form action="/login" method="POST" class="box login-panel">
    @csrf

    <h5 class="is-5 title has-text-centered">Login</h5>
    <div class="field">
        <!--
            Task 3 Guest, step 2:
            add login fields as instructed

            Tip:
            you can use the same style as the registration form
        -->
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="email" id="email" value="{{ old('email') }}">

        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="password" id="password" value="">

        <div class="field">
        <!--
            Task 3 Guest, step 3:
            add submit button

            Tip:
            you can use the class "button is-primary is-fullwidth" for the appearance of the button
        -->

            <button type="submit" class="login-submit button is-primary is-fullwidth">Register</button>
    </div>

</form>
