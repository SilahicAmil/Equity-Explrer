import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.jsx';
import { Head } from '@inertiajs/react';

const StocksMainPage = ({ stocks, $stock_sector }) => {
  console.log('stocks', stocks);
  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Stocks
        </h2>
      }
    >
      <Head title="Stocks" />
      <ul>
        {stocks.data.map((stock) => {
          return (
            <li key={stock.id}>
              {stock.stock_name} - {stock.current_price} - {stock.symbol} -{' '}
              {stock.stock_sector}
            </li>
          );
        })}
      </ul>
    </AuthenticatedLayout>
  );
};

export default StocksMainPage;
