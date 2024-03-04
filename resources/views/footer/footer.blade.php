<footer>
    <div class="footer-container">
      <div class="footer-left">
        <p>&copy; 2024 Mabini Farm School. All rights reserved.</p>
      </div>
      <div class="footer-right">
        <ul>
          <li><a href="#">Memo</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Programs</a></li>
          <li><a href="#">Procurement</a></li>
          <li><a href="#">About Us</a></li>
        </ul>
      </div>
    </div>
  </footer>

<style>
   footer {
  background-color: #044D0B;
  color: #fff;
  padding: 1rem;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
}

.footer-left {
  flex-basis: 40%;
}

.footer-left p {
  margin: 0;
}

.footer-right {
  flex-basis: 60%;
  display: flex;
  justify-content: flex-end;
}

.footer-right ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: flex;
}

.footer-right li {
  margin-right: 1rem;
}

.footer-right a {
  color: #fff;
  text-decoration: none;
}

@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    align-items: center;
  }

  .footer-left {
    flex-basis: 100%;
  }

  .footer-right {
    flex-basis: 100%;
    margin-top: 1rem;
  }

  .footer-right ul {
    flex-direction: column;
  }

  .footer-right li {
    margin-right: 0;
    margin-bottom: 0.5rem;
  }
}
</style>