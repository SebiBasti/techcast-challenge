import { Link } from '@inertiajs/react'

import navbarStyles from '../../css/navbar.module.css'

export default function Navbar() {
  return (
    <nav className={navbarStyles.navbar}>
      <Link href="/presentations">Presentations</Link>
      <Link href="/conferences">Conferences</Link>
      <Link href="single-events">Single Events</Link>
    </nav>
  )
}
