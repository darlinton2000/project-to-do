<x-layout page="To-Do Login">

    <x-slot:btn>
        <a href="{{ route('login') }}" class="btn btn-primary">
            Já possui conta? Faça login
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1> Registrar-se </h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif

        <form method="POST" action="{{ Route('user.register_action') }}">
            @csrf

            <x-form.text_input name="name" label="Seu nome" placeholder="Seu nome" required="required" />
            <x-form.text_input type="email" name="email" label="Seu email" placeholder="Seu email"
                required="required" />
            <x-form.text_input type="password" name="password" label="Sua senha" placeholder="Sua senha"
                required="required" />
            <x-form.text_input type="password" name="password_confirmation" label="Confirme sua Senha"
                placeholder="Confirme sua Senha" required="required" />

            <x-form.form_button resetTxt="Limpar" submitTxt="Registrar-se" />
        </form>
    </section>
</x-layout>
