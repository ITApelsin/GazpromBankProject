package ru.itapelsin.persistence;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.Entity;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;

@Entity
@Getter
@Setter
@NamedQueries({
        @NamedQuery(name = Account.FIND_BY_EMAIL_AND_PASSWORD,
            query = "SELECT a FROM Account a WHERE a.email = :email AND " +
                    "a.password = :password")
})
public class Account extends AbstractEntity {

    public final static String FIND_BY_EMAIL_AND_PASSWORD = "Account.findByEmailAndPassword";

    private String username;

    private String email;

    private String password;

    private byte[] icon;
}
