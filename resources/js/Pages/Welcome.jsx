import { Head, Link } from '@inertiajs/react';

export default function Welcome({ auth, laravelVersion, phpVersion }) {
  const handleImageError = () => {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
  };

  return (
    <>
      <Head title="Welcome" />
      <div>
        <nav>
          {auth.user ? (
            <Link href={route('dashboard')} className="text-black">
              Dashboard
            </Link>
          ) : (
            <>
              <Link href={route('login')} className="text-black">
                Log in
              </Link>
              <Link href={route('register')} className="text-black">
                Register
              </Link>
            </>
          )}
        </nav>
      </div>
    </>
  );
}
