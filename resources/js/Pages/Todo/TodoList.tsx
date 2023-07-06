import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { PageProps, Todo } from '@/types';

interface TodoListProps extends PageProps {
    todos: Todo[];
}

export default function TodoList({ auth, todos }: TodoListProps) {

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">TodoList</h2>}
        >
            <Head title="TodoList" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            {todos.map((item) => (
                                <div key={item.id}>
                                    {item.id} /
                                    {item.user_id} /
                                    {item.title} /
                                    {item.description} /
                                    {item.created_at} /
                                    {item.updated_at}
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
