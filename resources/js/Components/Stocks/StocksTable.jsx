import { useEffect, useState } from 'react';

import { Link } from '@inertiajs/react';
import StockTableRow from './StockTableRow';

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
    <table class="table-auto w-full h-full">
      <thead>
        <tr>
          <th>#</th>
          <th>Stock Name</th>
          <th>Current Price</th>
          <th>Stock Sector</th>
          <th>Chart</th>
        </tr>
      </thead>
      <tbody>
        <StockTableRow stockData={stockData.data} />
      </tbody>
    </table>
  );
};

export default StocksTable;
