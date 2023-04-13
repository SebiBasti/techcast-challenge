import React from 'react'

import InputError from '@/Components/InputError'
import PrimaryButton from '@/Components/PrimaryButton'
import { Head, useForm, usePage } from '@inertiajs/react'
import DatePicker from 'react-datepicker'
import 'react-datepicker/dist/react-datepicker.css'

import tableStyles from '../../../css/table.module.css'

export default function Index({ auth }) {
  const { data, setData, post, processing, reset, errors } = useForm({
    title: '',
    date: new Date()
  })

  const { singleEvents } = usePage().props

  const submit = (e) => {
    e.preventDefault()
    post(route('single-events.store'), { onSuccess: () => reset() })
  }

  return (
    <>
      <Head title="Single Events" />
      <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form onSubmit={submit}>
          <input
            value={data.title}
            placeholder="Title of single event:"
            type="text"
            className="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-2"
            onChange={(e) => setData('title', e.target.value)}
          ></input>
          <DatePicker
            selected={data.date}
            onChange={(e) => {
              setData('date', e)
            }}
          />
          <InputError message={errors.title} className="mt-2" />
          <PrimaryButton className="mt-4" disabled={processing}>
            Create Event
          </PrimaryButton>
        </form>

        <h2 className={tableStyles.header}>List of all single events:</h2>
        <br />
        <table className={tableStyles.table}>
          <thead>
            <tr>
              <th>Title</th>
              <th>Content</th>
            </tr>
          </thead>
          <tbody>
            {singleEvents.map((singleEvent) => (
              <tr key={singleEvent.id}>
                <td>{singleEvent.title}</td>
                <td>{singleEvent.date}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </>
  )
}
