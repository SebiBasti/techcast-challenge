import React from 'react'

import InputError from '@/Components/InputError'
import PrimaryButton from '@/Components/PrimaryButton'
import { usePage } from '@inertiajs/react'
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { Head, useForm } from '@inertiajs/react'

export default function Index({ auth }) {
  const { data, setData, post, processing, reset, errors } = useForm({
    title: '',
    content: '',
    presentable_type: null,
    presentable_id: null
  })

  const { conferences, singleEvents, presentations } = usePage().props
  console.log(presentations)

  const submit = (e) => {
    e.preventDefault()
    post(route('presentations.store'), { onSuccess: () => reset() })
  }

  return (
    <>
      <Head title="Presentations" />
      <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form onSubmit={submit}>
          <textarea
            value={data.title}
            placeholder="Title of presentation:"
            className="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            onChange={(e) => setData('title', e.target.value)}
          />
          <textarea
            value={data.content}
            placeholder="Content of presentation:"
            className="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            onChange={(e) => setData('content', e.target.value)}
          />

          <label htmlFor="event_type">Event type</label>
          <select
            name="event_type"
            id="event_type"
            className="form-control"
            onChange={(e) => {
              setData((data) => ({
                ...data,
                presentable_type:
                  e.target.selectedOptions[0].dataset.presentableType
              }))
              setData((data) => ({ ...data, presentable_id: e.target.value }))
            }}
          >
            <option value="">-- Select event type --</option>
            <optgroup label="Conferences">
              {conferences.map((conference) => (
                <option
                  key={conference.id}
                  value={conference.id}
                  data-presentable-type="App\Models\Conference"
                >
                  {conference.title}
                </option>
              ))}
            </optgroup>
            <optgroup label="Single events">
              {singleEvents.map((single_event) => (
                <option
                  key={single_event.id}
                  value={single_event.id}
                  data-presentable-type="App\Models\SingleEvent"
                >
                  {single_event.title}
                </option>
              ))}
            </optgroup>
          </select>

          <InputError message={errors.title} className="mt-2" />
          <PrimaryButton className="mt-4" disabled={processing}>
            Create presentation
          </PrimaryButton>
        </form>
      </div>

      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Event</th>
          </tr>
        </thead>
        <tbody>
          {presentations.map((presentation) => (
            <tr key={presentation.id}>
              <td>{presentation.title}</td>
              <td>{presentation.content}</td>
              <td>{presentation.presentable.title}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </>
  )
}
