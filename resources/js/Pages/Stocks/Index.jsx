import { useEffect, useState } from 'react';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.jsx';
import { Head } from '@inertiajs/react';
import { Link } from '@inertiajs/react';

const StocksMainPage = ({ stocks, $stock_sector }) => {
  const [stockData, setStockData] = useState([]);

  const fetchStockData = async () => {
    try {
      const res = await fetch('http://127.0.0.1:8000/api/stockData');
      if (!res.ok) {
        throw new Error('Failed to fetch stock data');
      }
      const data = await res.json();
      console.log(data); // Log the data to inspect its structure
      setStockData(data); // Assuming the response is an array or an object with a 'data' property
    } catch (error) {
      console.error(error);
      setStockData([]); // Reset to empty array if error occurs
    }
  };

  useEffect(() => {
    fetchStockData();
  }, []);

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
        {Array.isArray(stockData.data) ? (
          stockData.data.map((stock) => (
            <li key={stock.stock_name}>
              <Link href={route('stocks.details', stock.stock_name)}>
                {stock.stock_name}
              </Link>
              - {stock.current_price} - {stock.symbol} - {stock.stock_sector}
            </li>
          ))
        ) : (
          <li>No stock data available</li>
        )}
      </ul>
    </AuthenticatedLayout>
  );
};

export default StocksMainPage;
