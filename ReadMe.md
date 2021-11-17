# Order form 🛒

Watch the result of this project >> [here](https://order-form-2.herokuapp.com/)

![order-form](https://user-images.githubusercontent.com/84382812/142246216-738ffc76-1a80-436e-9fab-c227d9ae73de.JPG)

## 🎯 Objectives
- Consolidate multiple forms

## ✔️ Specifications
- Create an order form for your shop, don't be afraid to be creative!
- Update the arrays with the products you'd like to sell
- Make sure all products and corresponding prices are visible in the form

### 🌱 Must-haves
#### 1️⃣ Accept orders
- Show an order confirmation when the user submits the form, containing the chosen products and delivery address.
-  There is no need to save this information to a database just yet. 

#### 2️⃣ Validation
- Use PHP to check the following:
    - Required fields are not empty.
    - Zip code are only numbers.
    - Email address is valid.
- Show any problems (empty or invalid data) with the fields at the top of the form. 
Tip: use the [bootstrap alerts](https://getbootstrap.com/docs/4.0/components/alerts/) for inspiration. If they are valid, the confirmation of step 1 is shown.
- If the form was not valid, show the previous values in the form so that the user doesn't have to retype everything.

#### 3️⃣ Improve UX by saving user data
- Check out the possibilities of the PHP session and cookies.
- We want to prefill the address (after the first usage), as long as the browser isn't closed. 

#### 4️⃣ Expand due to success
- Find commented navigation and activate it. Tweak the content for your own store.
- Make a second category of products, and provide a new array for this info.
- The navigation should work as a toggle to switch between the two categories of products.


### 🌻 Nice-to-haves
#### 1️⃣ Delivery times
- Show the expected delivery time in the confirmation message (2h by default).
- A user can opt for express delivery (5$ for delivery in 45min).

#### 2️⃣ Statistics
- Show statistics about how much money has been spent. This info should be kept (can you use the session or cookies for this?) when the browser closes.
- Include the most popular product (by this user) and amount of products bought by this user.

#### 3️⃣ Look & feel
- What kind of style would suit your store? Add a color schema and a suitable font.
- Check what you can do for validation with html and JS. Use this to improve your validation.

#### 4️⃣ Bulk orders
- Allow the user to specify how much he or she wants to buy of a certain products

