import { Head, Link } from "@inertiajs/react";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { PageProps, Todo } from "@/types";

interface TodoUpdateProps extends PageProps {
  todo: Todo;
}

export default function TodoDetail({ auth, todo }: TodoUpdateProps) {
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
          TodoUpdate
        </h2>
      }
    >
      <Head title="TodoUpdate" />

      <div className="py-12">
        <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div className="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div className="p-6 text-gray-900">
              <div>
                <h1 className="mb-8 text-3xl font-bold text-white">
                  <Link
                    href={route("todos.index")}
                    className="text-indigo-600 hover:text-indigo-700"
                  >
                    Todos
                  </Link>
                  <span className="font-medium text-indigo-600"> / </span>
                  Update
                </h1>
              </div>
              <div className="max-w-6xl rounded bg-white p-8 text-black shadow">
                <div className="flex flex-col">
                  <div className="mb-4">
                    <span className="w-full px-4 py-2">{todo.title}</span>
                  </div>
                  <div className="mb-0">
                    <label htmlFor="description">Description</label>
                    <div className="w-full rounded">{todo.description}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
