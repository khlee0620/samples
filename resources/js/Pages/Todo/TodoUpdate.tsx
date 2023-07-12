import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm, Link } from "@inertiajs/react";
import { PageProps, Todo } from "@/types";

interface TodoUpdateProps extends PageProps {
  todo: Todo;
}

export default function TodoUpdate({ auth, todo }: TodoUpdateProps) {
  const { data, setData, errors, patch } = useForm({
    title: todo.title,
    description: todo.description,
  });

  function handleSubmit(e: any) {
    e.preventDefault();
    patch(route("todos.update", todo.id));
  }

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
                <form name="createForm" onSubmit={handleSubmit}>
                  <div className="flex flex-col">
                    <div className="mb-4">
                      <label htmlFor="title">Title</label>
                      <input
                        type="text"
                        className="w-full px-4 py-2"
                        id="title"
                        name="title"
                        value={data.title}
                        onChange={(e) => setData("title", e.target.value)}
                      />
                      <span className="text-red-600">{errors.title}</span>
                    </div>
                    <div className="mb-0">
                      <label htmlFor="description">Description</label>
                      <textarea
                        className="w-full rounded"
                        name="description"
                        value={data.description}
                        onChange={(e) => setData("description", e.target.value)}
                      />
                      <span className="text-red-600">{errors.description}</span>
                    </div>
                  </div>
                  <div className="mt-4">
                    <button
                      type="submit"
                      className="rounded bg-green-500 px-6 py-2 font-bold text-white"
                    >
                      Save
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
