<<<<<<< Updated upstream
import axios from 'axios';
import { useState } from 'react';

const TradeForm = ({ stocks }) => {
  const [formData, setFormData] = useState({
    name: 'Botsford Group',
    quantity: 1,
    type: 'buy',
  });

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const submitStockTransaction = async (e) => {
=======
import { useEffect, useState } from 'react';

const TradeForm = ({ selectedStock }) => {
  const [formData, setFormData] = useState({
    name: '',
    quantity: 0,
    current_price: 0,
    type: '',
  });

  useEffect(() => {
    if (selectedStock) {
      setFormData({
        name: selectedStock.stock_name,
        current_price: selectedStock.current_price,
        type: '',
        quantity: 0,
      });
    }
  }, [selectedStock]);

  async function submitTradeForm(e) {
>>>>>>> Stashed changes
    e.preventDefault();
    try {
      const res = await axios.post('/trade', formData, {
        withCredentials: true,
      });
    } catch (e) {
<<<<<<< Updated upstream
      console.error(e);
    }
  };

  return (
    // TODO: IMplement what I did with StocksFiltering here basically.
    <form onSubmit={submitStockTransaction}>
      <div className="mb-2">
        <label htmlFor="">Stock Name</label>
        <input
          type="text"
          name="name"
          placeholder="Name"
          value={formData.name}
          onChange={handleInputChange}
        />
      </div>
      <button type="submit">Submit</button>
    </form>
=======
      console.error('Error submitting form:', e.response?.data);
    }
  }

  function handleInputChange(e) {
    const { name, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));
  }

  return (
    <div className="font-mono">
      <form onSubmit={submitTradeForm}>
        <div className="flex justify-center items-center flex-col mb-4">
          <label htmlFor="" className="text-2xl">
            Stock Name
          </label>
          <input
            type="text"
            className="text-sm w-1/2 "
            placeholder={
              selectedStock?.stock_name
                ? selectedStock?.stock_name
                : 'Select stock from left'
            }
            value={formData.stock_name}
            onChange={handleInputChange}
          />
        </div>
        <div className="flex justify-center items-center flex-col mb-4">
          <label htmlFor="" className="text-2xl">
            Stock Price
          </label>
          <input
            type="text"
            className="text-sm w-1/2 "
            placeholder={
              selectedStock?.current_price
                ? selectedStock?.current_price
                : '0.00'
            }
            value={formData.current_price}
            onChange={handleInputChange}
          />
        </div>
        <div className="flex justify-center items-center flex-col mb-4">
          <label htmlFor="" className="text-2xl">
            Quantity
          </label>
          <input
            type="text"
            className="text-sm w-1/2 "
            placeholder="0"
            // value={formData.quantity}
            onChange={handleInputChange}
          />
        </div>
        <div className="flex justify-center items-center flex-col mb-4">
          <label htmlFor="" className="text-2xl">
            Transaction Type
          </label>
          <div className="flex gap-4 items-center">
            <label>Buy</label>
            <input
              type="radio"
              name="transaction_type"
              value="buy"
              checked={(formData.type = 'buy')}
              onChange={handleInputChange}
            />
            <label>Sell</label>
            <input
              type="radio"
              name="transaction_type"
              value="sell"
              checked={(formData.type = 'sell')}
              onChange={handleInputChange}
            />
          </div>
        </div>
        <div className="flex items-center w-full justify-center">
          <button className="bg-green-500 p-4 rounded-xl" type="submit">
            Submit
          </button>
        </div>
      </form>
    </div>
>>>>>>> Stashed changes
  );
};

export default TradeForm;
