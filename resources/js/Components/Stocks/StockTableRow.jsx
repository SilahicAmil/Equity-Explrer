import { Link } from '@inertiajs/react';

const StockTableRow = ({ stockData }) => {
  return (
    <>
      {Array.isArray(stockData) ? (
        stockData.map((stock) => (
          <tr key={stock.id}>
            <td>{stock.id}</td>
            <Link href={`/stocks/${stock.stock_name}`}>
              <td className="flex justify-center">{stock.stock_name}</td>
            </Link>

            <td>{stock.current_price}</td>
            <td>{stock.stock_sector}</td>
            {/* TODO: Change this to chart component later on */}
            <td>{stock.symbol}</td>
          </tr>
        ))
      ) : (
        <p>No Stocks</p>
      )}
    </>
  );
};

export default StockTableRow;
