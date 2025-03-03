import axios from 'axios';
import { useState } from 'react';

const TradeForm = ({ stocks }) => {
  const [formData, setFormData] = useState({
    name: 'Dietrich and Sons',
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
