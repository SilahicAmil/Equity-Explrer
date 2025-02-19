import StockTableRow from './StockTableRow';
import { useQuery } from '@tanstack/react-query';

const StocksTable = () => {
  const fetchStockData = async () => {
    try {
      const res = await fetch('http://127.0.0.1:8000/api/stockData');
      if (!res.ok) {
        throw new Error('Failed to fetch stock data');
      }
      return await res.json();
    } catch (error) {
      console.error(error);
    }
  };

  const { data, error, isLoading, fetchStatus } = useQuery({
    queryKey: ['stocks'],
    queryFn: fetchStockData,
    cacheTime: 1000 * 60 * 5, // 5 mins?
  });

  if (fetchStatus == 'fetching') return <div>Loading...</div>;

  return (
    <table className="table-auto w-full h-full">
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
        <StockTableRow stockData={data.data} />
      </tbody>
    </table>
  );
};

export default StocksTable;
