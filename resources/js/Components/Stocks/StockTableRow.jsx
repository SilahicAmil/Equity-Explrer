import { Link } from '@inertiajs/react';

const StockTableRow = ({ stockData, setSelectedStock }) => {
  // I think we can pass props all the way down
  // Easier to use context tho
  return (
    <>
      {Array.isArray(stockData) ? (
        stockData.map((stock) => (
          <tr
            key={stock.id}
            className="text-center"
            onClick={() => setSelectedStock(stock)}
          >
            <td>{stock.id}</td>
            {/* On click we need to send this data to the trade form */}
            {/* Now whats the easiest way to do this? */}
            <td>{stock.stock_name}</td>
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
