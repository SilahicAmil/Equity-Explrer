import React from 'react';

const StockTableRow = ({ stockData }) => {
  return (
    <>
      {Array.isArray(stockData) ? (
        stockData.map((stock) => (
          <tr>
            <td>{stock.id}</td>
            <td>{stock.stock_name}</td>
            <td>{stock.stock_price}</td>
            <td>{stock.stock_sector}</td>
            {/* Change this to chart component later on */}
            <td>{stock.stock_sector}</td>
          </tr>
        ))
      ) : (
        <p>No Stocks</p>
      )}
    </>
  );
};

export default StockTableRow;
