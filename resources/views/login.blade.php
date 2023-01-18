<x-layout page="To-Do Login">

    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>
    
    <section id="task_section">
        <h1> Autenticação </h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif

        <form method="POST" action="{{ Route('user.login_action') }}">
            @csrf

            <x-form.text_input type="email" name="email" label="Seu email" placeholder="Seu email" required="required" />
            <x-form.text_input type="password" name="password" label="Sua senha" placeholder="Sua senha" required="required" />

            <x-form.form_button resetTxt="Limpar" submitTxt="Login" />
        </form>
    </section>

</x-layout>
