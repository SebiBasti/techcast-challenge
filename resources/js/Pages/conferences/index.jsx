import React from 'react'

import InputError from '@/Components/InputError'
import PrimaryButton from '@/Components/PrimaryButton'
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { Head, useForm } from '@inertiajs/react'
import DatePicker from 'react-datepicker'
import 'react-datepicker/dist/react-datepicker.css'

export default function Index({ auth }) {
  const { data, setData, post, processing, reset, errors } = useForm({
    title: '',
    date: new Date()
  })

  const submit = (e) => {
    e.preventDefault()
    post(route('conferences.store'), { onSuccess: () => reset() })
  }

  return (
    <>
      <Head title="Conferences" />
      <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form onSubmit={submit}>
          <textarea
            value={data.title}
            placeholder="Title of conference:"
            className="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            onChange={(e) => setData('title', e.target.value)}
          ></textarea>
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
      </div>
    </>
  )
}
