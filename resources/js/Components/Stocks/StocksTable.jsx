import { useEffect, useState } from 'react';

import { Link } from '@inertiajs/react';
const StocksTable = () => {
  const [stockData, setStockData] = useState([]);

  const fetchStockData = async () => {
    try {
      const res = await fetch('http://127.0.0.1:8000/api/stockData');
      if (!res.ok) {
        throw new Error('Failed to fetch stock data');
      }
      const data = await res.json();
      setStockData(data);
    } catch (error) {
      console.error(error);
      setStockData([]);
    }
  };

  useEffect(() => {
    fetchStockData();
  }, []);

  return (
    <div>
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
    </div>
  );
};

export default StocksTable;
