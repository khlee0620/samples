import { Head, Link, useForm } from "@inertiajs/react";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { PageProps, Todo } from "@/types";

interface TodoListProps extends PageProps {
  todos: Todo[];
}

export default function TodoList({ auth, todos }: TodoListProps) {
  const { delete: destroy } = useForm();

  const handleDelete = (id: number) => {
    if (confirm("정말 삭제하시겠습니까?")) {
      return destroy(route("todos.destroy", id));
    }
  };

  return (
    <AuthenticatedLayout
      user={auth.user}
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
          TodoList
        </h2>
      }
    >
      <Head title="TodoList" />

      <div className="py-12">
        <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div className="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div className="p-6 text-gray-900 dark:text-gray-100">
              <div className="mb-6 flex items-center justify-between">
                <Link
                  className="rounded-md bg-green-500 px-6 py-2 text-white focus:outline-none"
                  href={route("todos.create")}
                >
                  Create Post
                </Link>
              </div>
              <div className="overflow-x-auto rounded bg-white shadow">
                <table className="w-full whitespace-nowrap">
                  <thead className="bg-gray-600 text-white">
                    <tr className="text-left font-bold">
                      <th className="px-6 pb-4 pt-5">No</th>
                      <th className="px-6 pb-4 pt-5">Title</th>
                      <th className="px-6 pb-4 pt-5">Description</th>
                      <th className="px-6 pb-4 pt-5">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    {todos.map((todo, index) => (
                      <tr key={index} className="text-black hover:bg-gray-500">
                        <td className="border-t">
                          <Link
                            href={route("todos.show", todo)}
                            className="flex min-w-[100px] items-center px-6 py-4 focus:text-indigo-700 focus:outline-none"
                          >
                            {index + 1}
                          </Link>
                        </td>
                        <td className="border-t">
                          <Link
                            href={route("todos.show", todo)}
                            className="... flex max-w-[200px] items-center truncate px-6 py-4 focus:text-indigo-700 focus:outline-none"
                          >
                            {todo.title}
                          </Link>
                        </td>
                        <td className="border-t">
                          <Link
                            className="... flex max-w-[300px] items-center truncate px-6 py-4"
                            href={route("todos.show", todo)}
                          >
                            {todo.description}
                          </Link>
                        </td>
                        <td className="border-t">
                          <Link
                            className="mr-2 rounded bg-blue-500 px-4 py-2 text-sm text-white"
                            href={route("todos.edit", todo.id)}
                          >
                            Edit
                          </Link>
                          <span
                            className="cursor-pointer rounded bg-red-500 px-4 py-2 text-sm text-white"
                            onClick={() => handleDelete(todo.id)}
                          >
                            delete
                          </span>
                        </td>
                      </tr>
                    ))}
                    {todos.length === 0 && (
                      <tr>
                        <td className="border-t px-6 py-4 text-black">
                          작성한 글이 없습니다.
                        </td>
                      </tr>
                    )}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
