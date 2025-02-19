import StockTableRow from './StockTableRow';

const StocksTable = ({ stocks }) => {
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
        <StockTableRow stockData={stocks.data} />
      </tbody>
    </table>
  );
};

export default StocksTable;
