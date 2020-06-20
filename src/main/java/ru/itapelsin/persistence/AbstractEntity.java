package ru.itapelsin.persistence;

import com.google.gson.annotations.Expose;
import lombok.Data;

import javax.persistence.*;

@MappedSuperclass
@Data
public abstract class AbstractEntity {

    @Id
    @GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "COMMON_ID_SEQUENCE_GENERATOR")
    @SequenceGenerator(name = "COMMON_ID_SEQUENCE_GENERATOR", sequenceName = "COMMON_ID_SEQUENCE",
            allocationSize = 10)
    @Expose(serialize = false, deserialize = false)
    private Long id;
}
