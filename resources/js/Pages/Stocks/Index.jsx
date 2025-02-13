import { useEffect, useState } from 'react';

import { Head } from '@inertiajs/react';
import { Link } from '@inertiajs/react';
import StocksLayout from '@/Layouts/StocksLayout';
import StocksTable from '@/Components/Stocks/StocksTable';

const StocksMainPage = () => {
  return (
    <StocksLayout>
      <Head title="Stocks" />
      <StocksTable />
    </StocksLayout>
  );
};

export default StocksMainPage;
