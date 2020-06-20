package ru.itapelsin.persistence;


import com.google.gson.annotations.Expose;
import lombok.Getter;
import lombok.Setter;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;

@Entity
@Getter
@Setter
@NamedQueries({
        @NamedQuery(name = Category.FIND_BY_NAME,
            query = "SELECT cat FROM Category cat WHERE cat.name = :name")
})
public class Category extends AbstractEntity {

    public static final String FIND_BY_NAME = "Category.findByName";

    @Column(nullable = false, unique = true)
    @Expose
    private String name;

    @Expose
    private int color;
}
