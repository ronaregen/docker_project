<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dunia Coding - DevOps ToDo</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-slate-900 text-slate-100 min-h-screen flex justify-center items-center font-sans">
        <div class="bg-slate-800 p-8 rounded-xl shadow-2xl w-full max-w-md border border-slate-700">
            <h1 class="text-3xl font-bold mb-6 text-cyan-400 tracking-tight">DevOps Task List</h1>

            <form action="/tasks" method="POST" class="flex mb-6 gap-2">
                @csrf
                <input type="text" name="title" placeholder="Tambah task baru..." autocomplete="off"
                    class="bg-slate-700 text-slate-100 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-cyan-500 placeholder-slate-400 text-sm">
                <button type="submit"
                    class="bg-cyan-500 hover:bg-cyan-400 transition-colors px-5 rounded-lg font-bold text-slate-950 text-sm">Tambah</button>
            </form>

            <ul class="space-y-3">
                @forelse($tasks as $task)
                    <li
                        class="flex justify-between items-center bg-slate-700/50 p-3 rounded-lg border border-slate-700/60 hover:border-slate-600 transition-all">
                        <form action="/tasks/{{ $task->id }}" method="POST" class="flex-1 m-0">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="text-left w-full block text-sm font-medium transition-all {{ $task->is_completed ? 'line-through text-slate-500 font-normal' : 'text-slate-200 hover:text-cyan-300' }}">
                                {{ $task->title }}
                            </button>
                        </form>

                        <form action="/tasks/{{ $task->id }}" method="POST" class="m-0 flex items-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-slate-400 hover:text-red-400 transition-colors px-2 text-lg font-bold">&times;</button>
                        </form>
                    </li>
                @empty
                    <li class="text-center py-6 text-sm text-slate-500 italic">
                        Belum ada task. Coba tambahkan di atas!
                    </li>
                @endforelse
            </ul>
        </div>
    </body>

</html>
