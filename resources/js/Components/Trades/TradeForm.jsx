import axios from 'axios';
import { useState } from 'react';

// TODO: Implement this next
// For now we can just filter the stocks array
// So like filter based off input with some type of debounce
// Eventually we probably want to make this an API to search?
// like TradeTransactionController -> search function
// Probably need to refactyor that name idk

const TradeForm = ({ stocks }) => {
  console.log(stocks);
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
    e.preventDefault();
    try {
      const res = await axios.post('/trade', formData, {
        withCredentials: true,
      });
    } catch (e) {
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
  );
};

export default TradeForm;
