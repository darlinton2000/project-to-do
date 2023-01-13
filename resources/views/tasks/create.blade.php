<x-layout page="To-Do Login">

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1> Criar tarefa </h1>
        <form method="POST" action="{{Route('task.create_action')}}">
            @csrf

            <x-form.text_input name="title" label="Titulo da Tarefa" placeholder="Digite o título da tarefa" required="required"/>
            <x-form.text_input type="date" name="due_date" label="Data de Realização" required="required"/>
            <x-form.select_input name="category_id" label="Categoria" required="required">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </x-form.select_input>
            <x-form.textarea_input name="description" label="Descrição da Tarefa" placeholder="Digite a descrição da tarefa"/>
            <x-form.form_button resetTxt="Resetar" submitTxt="Criar Tarefa"/>

        </form>
    </section>
</x-layout>