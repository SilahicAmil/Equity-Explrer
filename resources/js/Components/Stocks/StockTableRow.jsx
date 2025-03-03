import { Link } from '@inertiajs/react';

const StockTableRow = ({ stockData }) => {
  return (
    <>
      {Array.isArray(stockData) ? (
        stockData.map((stock) => (
          <tr key={stock.id} className="text-center">
            <td>{stock.id}</td>
            <td>
              <Link href={`/stocks/${stock.stock_name}`}>
                {stock.stock_name}
              </Link>
            </td>
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
