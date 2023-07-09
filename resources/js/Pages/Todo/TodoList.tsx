import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
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
        <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          TodoList
        </h2>
      }
    >
      <Head title="TodoList" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6 text-gray-900 dark:text-gray-100">
              <div className="flex items-center justify-between mb-6">
                <a
                  className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                  href={route("todos.create")}
                >
                  Create Post
                </a>
              </div>
              <div className="overflow-x-auto bg-white rounded shadow">
                <table className="w-full whitespace-nowrap">
                  <thead className="text-white bg-gray-600">
                    <tr className="font-bold text-left">
                      <th className="px-6 pt-5 pb-4">No</th>
                      <th className="px-6 pt-5 pb-4">Title</th>
                      <th className="px-6 pt-5 pb-4">
                        Description
                      </th>
                      <th className="px-6 pt-5 pb-4">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    {todos.map(({ id, title, description }, index) => (
                      <tr key={id} className="text-black hover:bg-gray-500">
                        <td className="border-t">
                          <a
                            href={route("todos.edit", id)}
                            className="flex items-center px-6 py-4 focus:text-indigo-700 focus:outline-none min-w-[100px]"
                          >
                            {index + 1}
                          </a>
                        </td>
                        <td className="border-t">
                          <a
                            href={route("todos.edit", id)}
                            className="flex items-center px-6 py-4 focus:text-indigo-700 focus:outline-none max-w-[200px] truncate ..."
                          >
                            {title}
                          </a>
                        </td>
                        <td className="border-t">
                          <a
                            className="flex items-center px-6 py-4 max-w-[300px] truncate ..."
                            href={route("todos.edit", id)}
                          >
                            {description}
                          </a>
                        </td>
                        <td className="border-t">
                          <a
                            className="px-4 py-2 mr-2 text-sm text-white bg-blue-500 rounded"
                            href={route("todos.edit", id)}
                          >
                            Edit
                          </a>
                          <span
                            className="px-4 py-2 text-sm text-white bg-red-500 rounded cursor-pointer"
                            onClick={() => handleDelete(id)}
                          >
                            delete
                          </span>
                        </td>
                      </tr>
                    ))}
                    {todos.length === 0 && (
                      <tr>
                        <td className="px-6 py-4 border-t text-black">
                          No contacts found.
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
