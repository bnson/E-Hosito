<?php

class AccountsModel extends Db {

    public function login($iEmail, $iPassword, $iRememberMe) {
        $account = null;
        $sqlQuerySelectAccountByEmail = "SELECT id, email, password, display_name FROM accounts WHERE email = ?";
        $sqlQueryUpdateRememberMe = "UPDATE accounts SET remember_me = ? WHERE id = ?";

        $conn = $this->connect();
        $stmt = $conn->prepare($sqlQuerySelectAccountByEmail);
        
        $id = null;
        $email = null;
        $password = null;
        $displayName = null;        

        if ($stmt) {
            $stmt->bind_param('s', $iEmail);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $email, $password, $displayName);
                $stmt->fetch();

                // Account exists, now we verify the password.
                // Note: remember to use password_hash in your registration file to store the hashed passwords.
                if (password_verify($iPassword, $password)) {
                    // Verification success! User has loggedin!
                    $account = new AccountObj();
                    $account->setId($id);
                    $account->setEmail($email);
                    $account->setDisplayName($displayName);
                    $account->setLoggedIn(TRUE);
                    
                    // IF the user checked the remember me check box:
                    if ($iRememberMe) {
                        // Create a hash that will be stored as a cookie and in the database, this will be used to identify the user.
                        $cookiehash = password_hash($id . $iEmail . 'yoursecretkey', PASSWORD_DEFAULT);
                        $account->setRememberMe($cookiehash);
                        
                        // Update the "rememberme" field in the accounts table
                        $stmt = $conn->prepare($sqlQueryUpdateRememberMe);
                        $stmt->bind_param('si', $cookiehash, $id);
                        $stmt->execute();
                    }                    
                    //echo 'Success';
                } else {
                    //echo 'Incorrect password!';
                }
            } else {
                //echo 'Incorrect username!';
            }
            $stmt->close();
        } else {
            //echo 'Could not prepare statement!';
        }
        $conn->close();
        return $account;
    }

    public function checkRememberMe($rememberMe) {
        $account = null;
        $sqlQuerySelectAccountByRememberMe = "SELECT id, email, display_name FROM accounts WHERE remember_me = ?";

        $conn = $this->connect();
        $stmt = $conn->prepare($sqlQuerySelectAccountByRememberMe);

        $id = null;
        $email = null;
        $displayName = null;

        if ($stmt) {
            $stmt->bind_param('s', $rememberMe);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $email, $displayName);
                $stmt->fetch();

                $account = new AccountObj();
                $account->setId($id);
                $account->setEmail($email);
                $account->setDisplayName($displayName);
                $account->setLoggedIn(TRUE);
            }
        } else {
            //echo 'Could not prepare statement!';
        }
        $conn->close();
        return $account;
    }

    private function runQuery($sql) {
        $result = $this->connect()->query($sql);

        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        
        return null;
    }    
}